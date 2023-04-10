import React, { Component } from 'react'
import RechercheComp from './RechercheComp'
import ResultatComp from './ResultatComp'

export default class RecherchePereComp extends Component {
    constructor(){
        super();
        this.list = [
            {nom:"banana", type:"fruit"},
            {nom:"orange", type:"fruit"},
            {nom:"ananas", type:"fruit"},
            {nom:"pomme de terre", type:"legume"},
            {nom:"pomme de terre", type:"legume"},
            {nom:"pomme de terre", type:"legume"},

        ];
        this.state = {rech: "", affiche: false}
    }
    modifier(nvRech){
        this.setState({rech: nvRech})
        // console.log(this.state.rech)
    }
    rechercher(){
        this.setState({affiche: true})
    }
    render() {
        const {rech} = this.state
        return (
        <div>
        <RechercheComp onModif={(x)=>this.modifier(x)}/>
        <button onClick={()=>this.rechercher()}>Recherche</button>
        {this.state.affiche==true ? <ResultatComp type={rech} list={this.list} onUpdate={()=>this.setState({affiche: false})}/>:null}
        
        </div>
        )
    }
}
