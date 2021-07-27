// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import HeaderV4 from 'header-v4';
import ScreenshotJson from 'interfaces/screenshot-json';
import { route } from 'laroute';
import { PopupMenuPersistent } from 'popup-menu-persistent';
import * as React from 'react';
import { StringWithComponent } from 'string-with-component';
import TimeWithTooltip from 'time-with-tooltip';
import { UserLink } from 'user-link';
import { classWithModifiers } from 'utils/css';

interface Props {
  screenshot: ScreenshotJson;
}

interface State {
  isBusy: boolean;
  isEdit: boolean;
  title: string;
}

export default class Main extends React.PureComponent<Props, State> {
  private inputRef = React.createRef<HTMLInputElement>();

  constructor(props: Props) {
    super(props);

    this.state = {
      isBusy: false,
      isEdit: false,
      title: this.props.screenshot.title,
    };
  }

  componentDidUpdate() {
    if (this.state.isEdit) {
      this.setInputFocus();
    }
  }

  render() {
    return (
      <>
        <HeaderV4 />

        <div className='osu-page osu-page--generic-compact'>
          <div className='screenshot-show'>
            <div className='screenshot-show__header'>
              <div
                className={classWithModifiers('screenshot-show__title-container', {
                  edit: this.state.isEdit,
                })}
              >
                <h1 className='screenshot-show__title screenshot-show__title--display'>
                  {this.state.title}
                </h1>
                <input
                  ref={this.inputRef}
                  className='screenshot-show__title screenshot-show__title--input'
                  disabled={this.state.isBusy}
                  onChange={this.handleEditInput}
                  type='text'
                  value={this.state.title}
                />
              </div>
              <div className='screenshot-show__detail'>
                <StringWithComponent
                  mappings={{
                    ':timeago': <TimeWithTooltip key='timeago' dateTime={this.props.screenshot.created_at} relative />,
                    ':user': <UserLink key='user' user={this.props.screenshot.user} />,
                  }}
                  pattern={osu.trans('screenshots.show.uploaded_by')}
                />
              </div>
            </div>

            <div className='screenshot-show__toolbar'>
              <button
                className='btn-osu-big btn-osu-big--forum-button'
                disabled={this.state.isBusy}
                onClick={this.toggleEditTitle}
              >
                {osu.trans(this.state.isEdit ? 'common.buttons.cancel' : 'screenshots.show.edit_title')}
              </button>

              {this.state.isEdit ? (
                <button
                  className='btn-osu-big btn-osu-big--forum-primary'
                  disabled={this.state.isBusy}
                  onClick={this.save}
                >
                  {osu.trans('common.buttons.save')}
                </button>
              ) : (
                <a
                  className='btn-osu-big btn-osu-big--forum-primary'
                  data-turbolinks={false}
                  download
                  href={this.props.screenshot.image_url ?? ''}
                >
                  {osu.trans('screenshots.show.download')}
                </a>
              )}

              <div className='screenshot-show__menu'>
                <PopupMenuPersistent>
                  {() => (
                    <button
                      className='simple-menu__item'
                      onClick={this.delete}
                    >
                      {osu.trans('common.buttons.delete')}
                    </button>
                  )}
                </PopupMenuPersistent>
              </div>
            </div>

            <div className='screenshot-show__content'>
              <img
                alt={this.props.screenshot.title}
                className='screenshot-show__image'
                src={this.props.screenshot.image_url ?? ''}
              />
            </div>
          </div>
        </div>
      </>
    );
  }

  private delete = () => {
    if (!confirm(osu.trans('screenshots.show.confirmation'))) return;

    $.ajax(route('screenshots.destroy', { screenshot: this.props.screenshot.id }), {
      method: 'DELETE',
    }).done(() => {
      // just reload for simplicity
      osu.reloadPage();
    }).fail(osu.ajaxError);
  };

  private handleEditInput = (e: React.ChangeEvent<HTMLInputElement>) => {
    this.setState({ title: e.target.value });
  };

  private save = () => {
    if (!osu.presence(this.state.title)) return;

    if (this.state.title === this.props.screenshot.title) {
      this.toggleEditTitle();
      return;
    }

    this.setState({ isBusy: true });

    $.ajax(route('screenshots.update', { screenshot: this.props.screenshot.id }), {
      data: {
        title: this.state.title,
      },
      method: 'PATCH',
    }).done(() => {
      this.toggleEditTitle();
      osu.reloadPage(); // Changing page title
    }).fail(osu.ajaxError)
      .always(() => {
        this.setState({ isBusy: false });
      });
  };

  private setInputFocus = () => {
    const inputTitle = this.inputRef.current;

    if (inputTitle != null) {
      inputTitle.focus();
      inputTitle.selectionStart = inputTitle.value.length;
    }
  };

  private toggleEditTitle = () => {
    this.setState({ isEdit: !this.state.isEdit });
  };
}
