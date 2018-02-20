import React from 'react';
import { observer } from 'mobx-react';
import { DateTimePicker } from 'react-widgets';
import 'react-widgets/dist/css/react-widgets.css';

export default observer(({ field }) => (
  <div className="measure">
    <DateTimePicker
      id={field.id}
      onChange={field.sync}
      name={field.name}
      placeholder={field.placeholder}
      time={false}
    />
  </div>
));
