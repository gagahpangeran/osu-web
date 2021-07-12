// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BeatmapsetExtendedJson from 'interfaces/beatmapset-extended-json';
import { route } from 'laroute';
import { Modal } from 'modal';
import * as moment from 'moment';
import * as React from 'react';
import TimeWithTooltip from 'time-with-tooltip';
import { UserLink } from 'user-link';
import { getNominators } from 'utils/beatmap-helper';
import MetadataEditor from './metadata-editor';

interface Props {
  beatmapset: BeatmapsetExtendedJson;
}

interface State {
  isEditing: boolean;
}

export default class Metadata extends React.PureComponent<Props, State> {
  constructor(props: Props) {
    super(props);

    this.state = {
      isEditing: false,
    };
  }

  render() {
    const tags = this.props.beatmapset.tags.split(' ');
    const canEdit = this.props.beatmapset.current_user_attributes?.can_edit_metadata ?? false;
    const nominators = getNominators(this.props.beatmapset);

    return (
      <div className='beatmapset-metadata'>
        {this.state.isEditing && (
          <Modal onClose={this.toggleEditing} visible>
            <MetadataEditor beatmapset={this.props.beatmapset} onClose={this.toggleEditing} />
          </Modal>
        )}

        <div>
          {osu.trans('beatmapsets.show.info.creator')}
        </div>
        <div>
          <UserLink
            user={{
              id: this.props.beatmapset.user_id,
              username: this.props.beatmapset.creator,
            }}
          />
        </div>

        {this.props.beatmapset.source !== '' && (
          <>
            <div>
              {osu.trans('beatmapsets.show.info.source')}
            </div>
            <div >
              <a href={route('beatmapsets.index', { q: this.props.beatmapset.source })}>
                {this.props.beatmapset.source}
              </a>
            </div>
          </>
        )}

        <div>
          {osu.trans('beatmapsets.show.info.genre')}
        </div>
        <div >
          <a href={route('beatmapsets.index', { g: this.props.beatmapset.genre.id })}>
            {this.props.beatmapset.genre.name}
          </a>
        </div>

        <div className='beatmapset-metadata__spacer' />

        <div>
          {osu.trans('beatmapsets.show.info.language')}
        </div>
        <div>
          <a href={route('beatmapsets.index', { l: this.props.beatmapset.language.id })}>
            {this.props.beatmapset.language.name}
          </a>
        </div>

        {tags.length > 0 && (
          <>
            <div>
              {osu.trans('beatmapsets.show.info.tags')}
            </div>
            <div className='beatmapset-metadata__tags u-fancy-scrollbar'>
              {tags.map((tag) => (
                <React.Fragment key={tag}>
                  <a key={tag} href={route('beatmapsets.index', { q: tag })}>
                    {tag}
                  </a>
                  <span> </span>
                </React.Fragment>
              ))}
            </div>
          </>
        )}

        <div className='beatmapset-metadata__spacer' />

        {nominators !== null && (
          <>
            <div>
              {osu.trans('beatmapsets.show.info.nominators')}
            </div>
            <div>
              {nominators.map((nominator, idx) => (
                <React.Fragment key={nominator.id}>
                  <UserLink user={{ id: nominator.id, username: nominator.username }} />
                  {idx < nominators.length - 1 && (<span>, </span>)}
                </React.Fragment>
              ))}
            </div>
          </>
        )}

        <div>
          {osu.trans('beatmapsets.show.info.submitted')}
        </div>
        <div >
          {this.renderDate(this.props.beatmapset.submitted_date)}
        </div>

        {this.props.beatmapset.ranked > 0 ? (
          <>
            <div>
              {osu.trans(`beatmapsets.show.info.${this.props.beatmapset.status}`)}
            </div>
            <div>
              {this.renderDate(this.props.beatmapset.ranked_date)}
            </div>
          </>
        ) : (
          <>
            <div>
              {osu.trans('beatmapsets.show.info.updated')}
            </div>
            <div>
              {this.renderDate(this.props.beatmapset.last_updated)}
            </div>
          </>
        )}

        {canEdit && (
          <div className='beatmapset-metadata__edit-button'>
            <button
              className='btn-circle'
              onClick={this.toggleEditing}
              type='button'
            >
              <span className='btn-circle__content'>
                <i className='fas fa-pencil-alt' />
              </span>
            </button>
          </div>
        )}
      </div>
    );
  }

  renderDate(dateTime: string) {
    return (
      <TimeWithTooltip
        dateTime={dateTime}
        relative={Math.abs(moment().diff(moment(dateTime), 'weeks')) < 4}
      />
    );
  }

  private toggleEditing = () => {
    this.setState({ isEditing: !this.state.isEditing });
  };
}