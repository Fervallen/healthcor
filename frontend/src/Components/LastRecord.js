import '../Styles/LastRecord.css';
import React, { Component } from 'react';
import RecordModel from '../Classes/Models/RecordModel';

class LastRecord extends Component {
  constructor(props) {
    super(props);
    this.state = { lastRecord: null };
    this.getLastRecord();
    window.addEventListener('newRecordAdded', (event) => {
      this.setState({ lastRecord: event.detail });
    });
  }

  getLastRecord() {
    RecordModel.last().then((record) => {
      if (!record.id) {
        record = false;
      }
      this.setState({ lastRecord: record });
    });
  }

  render() {
    let headerText = 'Loading...';
    if (this.state.lastRecord === false) {
      headerText = 'No records added, yet.'
    } else if (this.state.lastRecord) {
      headerText = `Last record: #${this.state.lastRecord.id}`;
    }

    return (
      <div className="last-record">
        <h2>{headerText}</h2>
        {this.getRecordStatsBlock()}
      </div>
    );
  }

  /**
   * @returns {null|*}
   */
  getRecordStatsBlock() {
    if (!this.state.lastRecord || !this.state.lastRecord.id) {
      return null;
    }
    let lastRecord = this.state.lastRecord;
    let lastRecordDate = new Date(lastRecord.date);

    return (
      <div>
        <p>
          <b>Added at</b>: {lastRecordDate.toDateString()} at {lastRecordDate.toTimeString().substr(0, 8)} ({ lastRecord.morning ? 'morning' : 'evening' })
        </p>
        { LastRecord.getStatsTable(this.getNumericStats()) }
        { LastRecord.getStatsTable(this.getBooleanStats()) }
      </div>
    );
  }



  /**
   * @param {Array} tableRows
   * @return {Object}
   */
  static getStatsTable(tableRows) {
    return (
      <table className="record-column">
        <tbody>
        { tableRows }
        </tbody>
      </table>
    );
  }

  /**
   * @return {Array}
   */
  getNumericStats() {
    return Object.keys(this.state.lastRecord).map((field) => {
      if ((typeof(this.state.lastRecord[field]) !== "boolean") &&
        (['id', 'date', 'morning', 'alcohol', 'feeding'].indexOf(field) === -1)
      ) {
        return (
          <tr key={field}>
            <td>{ LastRecord.getFieldTitle(field) }</td>
            <td>{ this.state.lastRecord[field] }</td>
          </tr>
        );
      }

      return null;
    });
  }

  /**
   * @return {Array}
   */
  getBooleanStats() {
    return Object.keys(this.state.lastRecord).map((field) => {
      if (typeof(this.state.lastRecord[field]) === "boolean") {
        return (
          <tr key={field}>
            <td>{ LastRecord.getFieldTitle(field) }</td>
            <td>{ this.state.lastRecord[field] ? 'true' : 'false' }</td>
          </tr>
        );
      }

      return null;
    });
  }


  /**
   * @param {string} field
   * @return {string}
   */
  static getFieldTitle(field) {
    field = field.replace('_level', '').replace(/_/g, ' ');
    if (field.length > 20) {
      field = field.substr(0, 18) + '…';
    }

    return field.charAt(0).toUpperCase() + field.slice(1);
  }
}

export default LastRecord;
