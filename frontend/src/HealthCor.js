import React, { Component } from 'react';
import AddRecord from "./Components/AddRecord";
import Header from "./Components/Header";
import LastRecord from "./Components/LastRecord";
import Notification from "./Components/Notification";

export default class HealthCor extends Component {
  render() {
    return (
      <div>
        <Notification />
        <Header />
        <div className="container">
          <AddRecord />
          <LastRecord />
        </div>
      </div>
    );
  }
}
