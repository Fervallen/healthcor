import React, { Component } from 'react';
import './App.css';
import AddRecord from "./Components/AddRecord";
import AddRecordForm from './Classes/AddRecordForm';
import AppHeader from "./Components/AppHeader";
import LastRecord from "./Components/LastRecord";

class App extends Component {
  render() {
    const addRecordForm = new AddRecordForm();

    return (
      <div className="App">
        <AppHeader />
        <div className="App-container">
          <AddRecord form={addRecordForm}/>
          <LastRecord />
        </div>
      </div>
    );
  }
}

export default App;
