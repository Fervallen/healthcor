import React from 'react';
import { observer } from 'mobx-react';
import TextField from 'material-ui/TextField';

export default observer(({
  field,
  type = 'number',
  placeholder = null,
  validatingText = 'validating...',
}) => (
  <div className="text-field">
    <TextField
      {...field.bind({ type, placeholder, validatingText })}
    /><br />
  </div>
));
