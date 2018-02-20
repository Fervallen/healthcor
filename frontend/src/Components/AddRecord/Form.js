import React, { Component } from 'react';
import AddRecordFormControls from './Controls';
import DatePickerWidget from '../Inputs/DatePicker';
import MaterialToggle from '../Inputs/MaterialToggle';
import MaterialTextField from '../Inputs/MaterialTextField';

export default class AddRecordForm extends Component {
  render() {
    return (
      <form>
        <fieldset>{ this._getDatePicker() }</fieldset>
        <fieldset>{ this._getTextFields() }</fieldset>
        <fieldset>{ this._getToggleFields() }</fieldset>
        <p>{this.props.form.error}</p>
        <AddRecordFormControls
          onSubmit={this.props.form.onSubmit}
          onReset={this.props.form.onReset}
        />
      </form>
    );
  }

  /**
   * @return {Array}
   * @private
   */
  _getDatePicker() {
    return this.props.form.setup().fields.map((field) => {
      if (field.type === 'date-picker') {
        return (
          <DatePickerWidget
            key={this.props.form.$(field.name).id}
            field={this.props.form.$(field.name)}
          />
        );
      }

      return null;
    })
  }

  /**
   * @return {Array}
   * @private
   */
  _getTextFields() {
    return this.props.form.setup().fields.map((field) => {
      if (!field.type) {
        return (
          <MaterialTextField
            key={this.props.form.$(field.name).id}
            field={this.props.form.$(field.name)}
          />
        );
      }

      return null;
    })
  }

  /**
   * @return {Array}
   * @private
   */
  _getToggleFields() {
    return this.props.form.setup().fields.map((field) => {
      if (field.type === 'checkbox') {
        return (
          <MaterialToggle
            key={this.props.form.$(field.name).id}
            field={this.props.form.$(field.name)}
          />
        );
      }

      return null;
    })
  }
}
