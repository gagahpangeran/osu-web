// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import Modal from 'components/modal';
import TimeWithTooltip from 'components/time-with-tooltip';
import UserLink from 'components/user-link';
import UserJson from 'interfaces/user-json';
import { route } from 'laroute';
import { action, computed, makeObservable, observable } from 'mobx';
import { observer } from 'mobx-react';
import * as moment from 'moment';
import * as React from 'react';
import { makeSearchQueryOption } from 'utils/beatmapset-helper';
import { trans } from 'utils/lang';
import Controller from './controller';
import MetadataEditor from './metadata-editor';

interface Props {
  controller: Controller;
}

@observer
export default class Metadata extends React.PureComponent<Props> {
  @observable private isEditing = false;

  private get controller() {
    return this.props.controller;
  }

  private get beatmapset() {
    return this.controller.beatmapset;
  }

  @computed
  private get nominators() {
    const ret: UserJson[] = [];
    const usersById = this.controller.usersById;
    for (const nomination of this.controller.beatmapset.current_nominations) {
      const user = usersById[nomination.user_id];
      if (user != null) {
        ret.push(user);
      }
    }

    return ret;
  }

  private get withEditMetadata() {
    return this.controller.beatmapset.current_user_attributes.can_edit_metadata;
  }

  constructor(props: Props) {
    super(props);
    makeObservable(this);
  }

  render() {
    return (
      <div className='beatmapset-metadata u-fancy-scrollbar'>
        {this.isEditing && (
          <Modal onClose={this.toggleEditing}>
            <MetadataEditor controller={this.props.controller} onClose={this.toggleEditing} />
          </Modal>
        )}

        {this.beatmapset.source !== '' && (
          <>
            <div>
              {trans('beatmapsets.show.info.source')}
            </div>
            <div className='beatmapset-metadata__value'>
              <a href={route('beatmapsets.index', { q: this.beatmapset.source })}>
                {this.beatmapset.source}
              </a>
            </div>
          </>
        )}

        <div>
          {trans('beatmapsets.show.info.genre')}
        </div>
        <div className='beatmapset-metadata__value'>
          <a href={route('beatmapsets.index', { g: this.beatmapset.genre.id })}>
            {this.beatmapset.genre.name}
          </a>
        </div>

        <div className='beatmapset-metadata__spacer' />

        <div>
          {trans('beatmapsets.show.info.language')}
        </div>
        <div className='beatmapset-metadata__value'>
          <a href={route('beatmapsets.index', { l: this.beatmapset.language.id })}>
            {this.beatmapset.language.name}
          </a>
        </div>

        {this.controller.tags.userTags.length > 0 && (
          <>
            <div>
              {trans('beatmapsets.show.info.user_tags')}
            </div>
            <div className='beatmapset-metadata__value beatmapset-metadata__value--tags'>
              {this.controller.tags.userTags.map((tag) => (
                <React.Fragment key={tag.name}>
                  <a href={route('beatmapsets.index', { q: makeSearchQueryOption('tag', tag.name) })}>
                    {tag.name}
                  </a>
                  {' '}
                </React.Fragment>
              ))}
            </div>
          </>
        )}

        {this.controller.tags.mapperTags.length > 0 && (
          <>
            <div>
              {trans('beatmapsets.show.info.mapper_tags')}
            </div>
            <div className='beatmapset-metadata__value beatmapset-metadata__value--tags'>
              {this.controller.tags.mapperTags.map((tag, idx) => (
                <React.Fragment key={`${tag}-${idx}`}>
                  <a href={route('beatmapsets.index', { q: tag })}>
                    {tag}
                  </a>
                  {' '}
                </React.Fragment>
              ))}
            </div>
          </>
        )}

        {this.controller.beatmapset.pack_tags.length > 0 && (
          <>
            <div>
              {trans('beatmapsets.show.info.pack_tags')}
            </div>
            <div className='beatmapset-metadata__value beatmapset-metadata__value--tags'>
              {this.controller.beatmapset.pack_tags.map((pack, idx) => (
                <React.Fragment key={`${pack}-${idx}`}>
                  {idx !== 0 && ', '}
                  <a href={route('packs.show', pack)}>{pack}</a>
                </React.Fragment>
              ))}
            </div>
          </>
        )}

        <div className='beatmapset-metadata__spacer' />

        {this.nominators != null && this.nominators.length > 0 && (
          <>
            <div>
              {trans('beatmapsets.show.info.nominators')}
            </div>
            <div className='beatmapset-metadata__value'>
              {this.nominators.map((nominator, idx) => (
                <React.Fragment key={nominator.id}>
                  <UserLink user={{ id: nominator.id, username: nominator.username }} />
                  {idx < this.nominators.length - 1 && (<span>, </span>)}
                </React.Fragment>
              ))}
            </div>
          </>
        )}

        {this.beatmapset.submitted_date != null && (
          <>
            <div>
              {trans('beatmapsets.show.info.submitted')}
            </div>
            <div className='beatmapset-metadata__value'>
              {this.renderDate(this.beatmapset.submitted_date)}
            </div>
          </>
        )}

        {this.beatmapset.ranked > 0 && this.beatmapset.ranked_date != null ? (
          <>
            <div>
              {trans(`beatmapsets.show.info.${this.beatmapset.status}`)}
            </div>
            <div className='beatmapset-metadata__value'>
              {this.renderDate(this.beatmapset.ranked_date)}
            </div>
          </>
        ) : (
          <>
            <div>
              {trans('beatmapsets.show.info.updated')}
            </div>
            <div className='beatmapset-metadata__value'>
              {this.renderDate(this.beatmapset.last_updated)}
            </div>
          </>
        )}

        {this.withEditMetadata && (
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

  private renderDate(dateTime: string) {
    return (
      <TimeWithTooltip
        dateTime={dateTime}
        relative={Math.abs(moment().diff(moment(dateTime), 'weeks')) < 4}
      />
    );
  }

  @action
  private readonly toggleEditing = () => {
    this.isEditing = !this.isEditing;
  };
}
