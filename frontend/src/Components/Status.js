import RecordModel from '../Classes/Models/RecordModel';
import React, { Component } from 'react';

export default class Status extends Component {
  constructor(props) {
    super(props);
    this.state = { count: null };
    this.updateCounter();
    window.addEventListener('newRecordAdded', () => {
      this.updateCounter();
    });
  }

  updateCounter() {
    RecordModel.count().then((count) => {
      this.setState({ count: count });
    });
  }

  render() {
    let text = (this.state.count !== null) ? `Observations collected: ${this.state.count}` : 'Loading...';

    return (
      <div className="status">{text}</div>
    );
  }
}
