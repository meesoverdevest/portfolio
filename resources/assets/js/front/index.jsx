import React from 'react';
import {render} from 'react-dom';
import { Provider } from 'react-redux';

import storeFactory from './utils/store';
import reducer from './reducer.js';

import App from './containers/app';

var store = storeFactory(reducer);

render(
	<Provider store={store}>
		<App/>
	</Provider>, 
	document.getElementById('react-canvas')
);