import { connect } from 'react-redux'
import React, { PropTypes } from 'react'

import { get_page } from '../utils/pages'

// class App extends React.Component {
//   render () {
//     return <p> Hello React!</p>;
//   }
// }

let App = ({page}) => (
	<div>
		<div>
	    {React.createElement(get_page(page))}
	  </div>
  </div>
)

const mapStateToProps = (state) => {
  return {
    page: state.page
  }
}

App = connect(
  mapStateToProps
)(App)

export default App