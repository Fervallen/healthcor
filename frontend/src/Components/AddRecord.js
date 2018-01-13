import '../Styles/AddRecord.css';
import React, { Component } from 'react';
import AddRecordObserver from './AddRecord/Observer';
import RecordModel from '../Classes/Models/RecordModel';
import RecordForm from '../Classes/Forms/RecordForm';

export default class AddRecord extends Component {
  constructor(props) {
    super(props);
    this.state = { form: this.getNewForm() };
  }

  /**
   * @return {RecordForm}
   */
  getNewForm() {
    return new RecordForm(this.addRecord.bind(this));
  }

  /**
   * @param {Object} formData
   */
  addRecord(formData) {
    window.dispatchEvent(new Event('addRecordFormSendingStarted'));
    RecordModel.add(formData).then((record) => {
      window.dispatchEvent(new Event('addRecordFormSendingFinished'));
      if (record && record.id) {
        window.dispatchEvent(new CustomEvent('newRecordAdded', { detail: record }));
        window.dispatchEvent(new CustomEvent('notification', { detail: {
          text: 'Successfully added a new record.',
          type: 'success',
        } }));
        this.setState({ form: this.getNewForm() });
      } else {
        window.dispatchEvent(new CustomEvent('notification', { detail: {
          text: 'Ooops! Something went wrong.',
          type: 'danger',
        } }));
      }
    });
  }

  render() {
    return (
      <div className="add-record">
        <h2>Add a new record</h2>
        <AddRecordObserver form={this.state.form}/>
      </div>
    );
  }
}
