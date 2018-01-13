import '../Styles/Notification.css';
import React, { Component } from 'react';

export default class Notification extends Component {
  constructor(props) {
    super(props);
    window.addEventListener('notification', (event) => {
      this.setState({
        text: event.detail.text,
        type: event.detail.type,
      });
    });
  }

  render() {
    return (this.state && this.state.text) ? (
      <div className={ 'notification ' + this.state.type }>
        { this.state.text }
      </div>
    ) : null;
  }
}
