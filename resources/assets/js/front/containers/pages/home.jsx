import { connect } from 'react-redux'
import React, { PropTypes } from 'react'


let PageHome = () => (
  <div className="container">
    <div className="alert alert-success">
      <h2>Welkom op het portfolio van Mees</h2>
      <p>De onderdelen leiden u door: de status van patiëntveiligheid, de inrichting van de logistieke processen, de status van barcodering van de producten en de software die u in huis heeft. Het resultaat is een samenvattend rapport dat u een handvat biedt om aan de slag te gaan!</p>
    </div>
  </div>
)

const mapStateToProps = (state) => {
  return {}
}

PageHome = connect(
  mapStateToProps
)(PageHome)

export default PageHome