import React, { Component } from 'react';
import options from '../env';
import 'whatwg-fetch';

class AppStatus extends Component {
  constructor(props) {
    super(props);
    this.state = { count: null };
  }

  componentDidMount() {
    fetch(options.domain + '/api/record/count')
      .then((response) => response.json())
      .then((count) => {
        this.setState({ count: count });
      });
  }

  shouldComponentUpdate(nextProps, nextState) {
    return (this.state.count === null) && (nextState.count !== null);
  }

  render() {
    let text = (this.state.count !== null) ? `Observations collected: ${this.state.count}` : 'Loading...';

    return (
      <div className="App-status">{text}</div>
    );
  }
}

export default AppStatus;
