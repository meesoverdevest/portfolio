import React from 'react';
import {render} from 'react-dom';
import { Provider } from 'react-redux';

import storeFactory from './utils/store';

class App extends React.Component {
  render () {
    return <p> Hello React!</p>;
  }
}

render(<App/>, document.getElementById('react-canvas'));