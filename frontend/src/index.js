import './Styles/index.css';
import React from 'react';
import HealthCor from './HealthCor';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import ReactDOM from 'react-dom';
import registerServiceWorker from './Environment/registerServiceWorker';

ReactDOM.render(
  <MuiThemeProvider>
    <HealthCor />
  </MuiThemeProvider>,
  document.getElementById('root')
);
registerServiceWorker();
