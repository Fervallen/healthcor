import './Styles/index.css';
import React from 'react';
import HealthCor from './HealthCor';
import moment from 'moment';
import momentLocalizer from 'react-widgets-moment';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import ReactDOM from 'react-dom';
import registerServiceWorker from './Environment/registerServiceWorker';

moment.locale('en');
momentLocalizer();

ReactDOM.render(
  <MuiThemeProvider>
    <HealthCor />
  </MuiThemeProvider>,
  document.getElementById('root')
);
registerServiceWorker();
