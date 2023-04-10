import React, { Component } from 'react'

export default class RechercheComp extends Component {
    constructor(props){
        super(props);
    }
    modif(e){
        this.props.onModif(e.target.value)
    }
  render() {
    return (
        <div>
        <label htmlFor="recherche">Recherche</label>
        <input type="text" name="recherche" id="recherche" onChange={(e)=>this.modif(e)}/>
        </div>
    )
  }
}
