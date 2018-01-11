import React from 'react';
import MaterialToggle from './Inputs/MaterialToggle';
import MaterialTextField from './Inputs/MaterialTextField';
import RaisedButton from 'material-ui/RaisedButton';
import { observer } from 'mobx-react';

export default observer(({ form }) => (
  <div className="App-add-record">
    <h2>Add a new record</h2>
    <form>
      <fieldset>
        {form.setup().fields.map((field) => {
          if (!field.type) {
            return (<MaterialTextField key={form.$(field.name).id} field={form.$(field.name)} />);
          }

          return null;
        })}
      </fieldset>
      <fieldset>
        {form.setup().fields.map((field) => {
          if (field.type === 'checkbox') {
            return (<MaterialToggle key={form.$(field.name).id} field={form.$(field.name)} />);
          }

          return null;
        })}
      </fieldset>
      <p>{form.error}</p>
      <div className="controls">
        <RaisedButton label="Submit" onClick={form.onSubmit} primary={true} />
        <RaisedButton label="Reset" onClick={form.onReset} secondary={true} />
      </div>
    </form>
  </div>
));
