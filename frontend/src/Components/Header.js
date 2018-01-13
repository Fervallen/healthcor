import '../Styles/Header.css';
import React, { Component } from 'react';
import Logo from '../Images/Logo.png';
import Status from './Status';

export default class Header extends Component {
  render() {
    const title = "HealthCor";

    return (
      <header>
        <h1>
          <img src={Logo} className="logo" alt={title} />
          {title}
        </h1>
        <Status />
      </header>
    );
  }
}
