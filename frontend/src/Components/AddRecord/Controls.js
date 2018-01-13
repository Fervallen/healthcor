import React, { Component } from 'react';
import RaisedButton from 'material-ui/RaisedButton';

export default class AddRecordFormControls extends Component {
  constructor(props) {
    super(props);
    this.state = { enabled: true };
    window.addEventListener('addRecordFormSendingStarted', () => {
      this.disable();
    });
    window.addEventListener('addRecordFormSendingFinished', () => {
      this.enable();
    });
  }

  enable() {
    this.setState({ enabled: true });
  }

  disable() {
    this.setState({ enabled: false });
  }

  render() {
    return (
      <div className="controls">
        <RaisedButton
          disabled={!this.state.enabled}
          label="Submit"
          onClick={this.props.onSubmit}
          primary={true}
        />
        <RaisedButton
          disabled={!this.state.enabled}
          label="Reset"
          onClick={this.props.onReset}
          secondary={true}
        />
      </div>
    );
  }
}
