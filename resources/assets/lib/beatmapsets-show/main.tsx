// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { Comments } from 'components/comments';
import { CommentsManager } from 'components/comments-manager';
import HeaderV4 from 'components/header-v4';
import PlaymodeTabs from 'components/playmode-tabs';
import GameMode, { gameModes } from 'interfaces/game-mode';
import { action, autorun, computed, makeObservable, observable } from 'mobx';
import { observer } from 'mobx-react';
import * as React from 'react';
import { generate, setHash } from 'utils/beatmapset-page-hash';
import Controller from './controller';
import Cover from './cover';
import Description from './description';
import Header from './header';
import headerLinks from './header-links';
import Hype from './hype';
import Info from './info';
import NsfwWarning from './nsfw-warning';
import Scoreboard from './scoreboard';
import Toolbar from './toolbar';

interface Props {
  container: HTMLElement;
}

@observer
export default class Main extends React.Component<Props> {
  @observable private controller: Controller;
  private disposers = new Set<(() => void) | undefined>();

  @computed
  private get headerLinksAppend() {
    if (this.controller.state.showingNsfwWarning) return null;

    const entries = gameModes.map((mode) => {
      const beatmaps = this.controller.beatmaps.get(mode) ?? [];
      const mainCount = beatmaps.filter((b) => !b.convert).length;

      return {
        count: mainCount > 0 ? mainCount : undefined,
        disabled: beatmaps.length === 0,
        href: generate({ mode }),
        mode,
      };
    });

    return (
      <PlaymodeTabs
        currentMode={this.controller.currentBeatmap.mode}
        entries={entries}
        modifiers='beatmapset'
        onClick={this.onClickPlaymode}
      />
    );
  }

  constructor(props: Props) {
    super(props);

    this.controller = new Controller(this.props.container);

    makeObservable(this);
  }

  componentDidMount() {
    this.disposers.add(autorun(this.setHash));
  }

  componentWillUnmount() {
    this.disposers.forEach((disposer) => disposer?.());
    this.controller.destroy();
  }

  render() {
    return (
      <div className='osu-layout osu-layout--full'>
        {this.renderPageHeader()}
        {this.controller.state.showingNsfwWarning
          ? <NsfwWarning onClose={this.onCloseNsfwWarning} />
          : this.renderPage()
        }
      </div>
    );
  }

  @action
  private readonly onClickPlaymode = (e: React.MouseEvent, mode: GameMode) => {
    e.preventDefault();

    this.controller.state.playmode = mode;
  };

  @action
  private readonly onCloseNsfwWarning = () => {
    this.controller.state.showingNsfwWarning = false;
  };

  private renderPage() {
    return (
      <>
        <div className='osu-page osu-page--generic-compact'>
          <Cover controller={this.controller} />
          <Header controller={this.controller} />
          <Info controller={this.controller} />
          <Toolbar controller={this.controller} />
          <Description controller={this.controller} />
        </div>

        {this.controller.beatmapset.can_be_hyped &&
          <div className='osu-page osu-page--generic-compact'>
            <Hype beatmapset={this.controller.beatmapset} />
          </div>
        }

        {this.controller.currentBeatmap.is_scoreable &&
          <div className='osu-page osu-page--generic'>
            <Scoreboard controller={this.controller} />
          </div>
        }

        <div className='osu-page osu-page--generic-compact'>
          <CommentsManager
            commentableId={this.controller.beatmapset.id}
            commentableType='beatmapset'
            component={Comments}
          />
        </div>
      </>
    );
  }

  private renderPageHeader() {
    return (
      <HeaderV4
        links={headerLinks('show', this.controller.beatmapset)}
        linksAppend={this.headerLinksAppend}
        theme='beatmapset'
      />
    );
  }

  private readonly setHash = () => {
    setHash(generate({ beatmap: this.controller.currentBeatmap }));
  };
}
