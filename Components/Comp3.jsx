import React, {Component} from "react";

export default class Comp3 extends Component{
    render(){
        const {nom, prenom} = this.props;
        return(<h1>hello {nom} {prenom}</h1>);
    }
}
