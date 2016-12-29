import { applyMiddleware, createStore, compose } from 'redux';

const factory = (reducer) => {  
  if (process.env.NODE_ENV == 'production') {
    return createStore(
      reducer
    );
  } else {
    var createLogger = require('redux-logger');
    var logger = createLogger();

    const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

    return createStore(
      reducer,
      composeEnhancers(applyMiddleware(logger))
    );
  }
};

export default factory;
