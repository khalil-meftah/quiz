import React, { Component } from 'react'

export default class ResultatComp extends Component {
    constructor(props){
        super(props);
        
    }
    componentDidUpdate(){
        this.props.onUpdate();
    }
  render() {
    let filtered = this.props.list.filter(elm => elm.type === this.props.type)
    let element = filtered.map(function(elem, index){return <li key = {index}>{elem.nom}</li>})
    console.log(this.props.type)
    return(
        <ul>{element}</ul>
    )
  }
}
