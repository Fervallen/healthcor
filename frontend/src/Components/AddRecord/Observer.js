import React from 'react';
import AddRecordForm from './Form';
import { observer } from 'mobx-react';

export default observer(({ form }) => (
  <AddRecordForm form={form} />
));
