/**
 *    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

import DispatcherAction from 'actions/dispatcher-action';
import DispatchListener from 'dispatch-listener';
import Dispatcher from 'dispatcher';

/* tslint:disable:max-classes-per-file */
class ClassA implements DispatchListener {
  count = 0;
  handleDispatchAction(action: DispatcherAction) {
    this.count++;
  }
}

class ClassB implements DispatchListener {
  handleDispatchAction(action: DispatcherAction) {
    // nothing
  }
}

class ClassAC extends ClassA {
  handleDispatchAction(action: DispatcherAction) {
    super.handleDispatchAction(action);
  }
}

class DummyAction extends DispatcherAction {}

describe('Dispatcher', () => {
  let subject: Dispatcher;

  beforeEach(() => {
    subject = new Dispatcher();
  });

  describe('.register', () => {
    it('should register the same instance only once', () => {
      const obj = new ClassA();
      subject.register(obj);
      subject.register(obj);
      // @ts-ignore
      expect(subject.listeners.size).toBe(1);
    });

    it('should register different instances', () => {
      const obj1 = new ClassA();
      const obj2 = new ClassA();
      subject.register(obj1);
      subject.register(obj2);
      // @ts-ignore
      expect(subject.listeners.size).toBe(2);
    });

    it('should register different class instances', () => {
      const obj1 = new ClassA();
      const obj2 = new ClassB();
      subject.register(obj1);
      subject.register(obj2);
      // @ts-ignore
      expect(subject.listeners.size).toBe(2);
    });

    it('should register subclasses separately', () => {
      const obj1 = new ClassA();
      const obj2 = new ClassAC();
      subject.register(obj1);
      subject.register(obj2);
      // @ts-ignore
      expect(subject.listeners.size).toBe(2);
    });
  });

  describe('.dispatch', () => {
    it('should send the action once', () => {
      const obj1 = new ClassA();
      const obj2 = new ClassAC();
      subject.register(obj1);
      subject.register(obj2);
      subject.register(obj1);
      subject.dispatch(new DummyAction());

      expect(obj1.count).toBe(1);
      expect(obj2.count).toBe(1);
    });
  });
});
