// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BbcodeEditor, { OnChangeProps } from 'bbcode-editor';
import BeatmapsetExtendedJson from 'interfaces/beatmapset-extended-json';
import { route } from 'laroute';
import * as React from 'react';
import { error, onErrorWithClick } from 'utils/ajax';

interface Props {
  beatmapset: BeatmapsetExtendedJson;
}

interface State {
  description?: { bbcode: string; description: string };
  isBusy: boolean;
  isEditing: boolean;
}

  constructor(props: Props) {
    super(props);

    this.state = {
      isBusy: false,
      isEditing: false,
    };
  }

  componentWillUnmount() {
    this.xhr?.abort();
  }

  render() {
    const canEdit = this.props.beatmapset.description.bbcode !== undefined;
    const description = this.state.description ?? this.props.beatmapset.description;

    return (
      <div className='page-extra page-extra--userpage'>
        {!this.isEditing && canEdit && (
          <div className='page-extra__actions'>
            <button
              className='btn-circle btn-circle--page-toggle'
              onClick={this.onStartEditClick}
              type='button'
            >
              <span className='fas fa-pencil-alt' />
            </button>
          </div>
        )}

        {this.isEditing && canEdit ? (
          <BbcodeEditor
            disabled={this.xhr != null}
            modifiers='profile-page'
            onChange={this.onEditorChange}
            rawValue={description.bbcode ?? ''}
          />
        ) : (
          <div className='page-extra__content-overflow-wrapper-outer u-fancy-scrollbar'>
            <div
              className='page-extra__content-overflow-wrapper-inner'
              dangerouslySetInnerHTML={{ __html: description.description ?? '' }}
            />
          </div>
        )}

      </div>
    );
  }

  private onEditorChange = (action: OnChangeProps) => {
    switch (action.type) {
      case 'cancel':
        this.setState({ isEditing: false });
        break;

      case 'save':
        if (action.hasChanged) {
          this.saveDescription(action);
        } else {
          this.setState({ isEditing: false });
        }
    }
  };

  private saveDescription = ({ event, value }: OnChangeProps) => {
    this.setState({ isBusy: true });

    const failCallback = event == null
      ? (xhr: JQuery.jqXHR, status: string) => error(xhr, status)
      : onErrorWithClick(event.target);

    this.xhr = $.ajax(route('beatmapsets.update', { beatmapset: this.props.beatmapset.id }), {
      data: {
        description: value,
      },
      method: 'PATCH',
    }).done((data: BeatmapsetExtendedJson) => {
      this.setState({
        description: data.description,
        isEditing: false,
      });
    }).fail(failCallback)
      .always(() => {
        this.setState({ isBusy: false });
      });
  };

  private toggleEditing = () => {
    this.setState({ isEditing: !this.state.isEditing });
  };
}
