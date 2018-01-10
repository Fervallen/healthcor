import React, { Component } from 'react';
import logo from '../img/logo.png';
import AppStatus from "./AppStatus";

class AppHeader extends Component {
  render() {
    const title = "HealthCor";
    return (
      <header className="App-header">
        <h1 className="App-title">
          <img src={logo} className="App-logo" alt={title} />
          {title}
        </h1>
        <AppStatus />
      </header>
    );
  }
}

export default AppHeader;
