// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import HeaderV4 from 'header-v4';
import ScreenshotJson from 'interfaces/screenshot-json';
import * as React from 'react';
import { StringWithComponent } from 'string-with-component';
import TimeWithTooltip from 'time-with-tooltip';
import { UserLink } from 'user-link';
import { classWithModifiers } from 'utils/css';

interface Props {
  screenshot: ScreenshotJson;
}

interface State {
  isEditTitle: boolean;
  title: string;
}

export default class Main extends React.PureComponent<Props, State> {
  private inputRef = React.createRef<HTMLInputElement>();

  constructor(props: Props) {
    super(props);

    this.state = {
      isEditTitle: false,
      title: this.props.screenshot.title,
    };
  }

  componentDidUpdate() {
    if (this.state.isEditTitle) {
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
                  edit: this.state.isEditTitle,
                })}
              >
                <h1 className='screenshot-show__title screenshot-show__title--display'>
                  {this.state.title}
                </h1>
                <input
                  ref={this.inputRef}
                  className='screenshot-show__title screenshot-show__title--input'
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
                onClick={this.toggleEditTitle}
              >
                {osu.trans(this.state.isEditTitle ? 'common.buttons.cancel' : 'screenshots.show.edit_title')}
              </button>

              {this.state.isEditTitle ? (
                <button
                  className='btn-osu-big btn-osu-big--forum-primary'
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

  private handleEditInput = (e: React.ChangeEvent<HTMLInputElement>) => {
    this.setState({ title: e.target.value });
  };

  private setInputFocus = () => {
    const inputTitle = this.inputRef.current;

    if (inputTitle != null) {
      inputTitle.focus();
      inputTitle.selectionStart = inputTitle.value.length;
    }
  };

  private toggleEditTitle = () => {
    this.setState({ isEditTitle: !this.state.isEditTitle });
  };
}
