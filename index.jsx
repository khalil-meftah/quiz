import React from 'react';
import ReactDOM from 'react-dom/client';
import { App1, App2 } from './Components/Comp1';
import Comp3 from './Components/Comp3';
import Item from './Components/Item';
import './index.css';
import './Styles/Item.css';
import ListItems from './Components/ListItems';
import CompState from './Components/CompState';
import Compteur from './Components/Compteur';
import Jeu from './Components/Jeu';
import Form from './Components/Form'
import RecherchePereComp from './Components/RecherchePereComp';
import CurrencyApp from './Components/CurrencyApp';




const root = ReactDOM.createRoot(document.getElementById('root'));
root.render (
    
    <>
    
    <App1 />
    <App2 nbArt="8" prixUni="50"/>
    <App2 nbArt="2" prixUni="30"/>
    <Comp3 nom="meftah" prenom="khalil"/> 
    <Item name="PC 1" src= "img.png" prix="3000"/>
    <ListItems />
    <CompState />
    <Compteur start={5}/>
    <Jeu/>
    <Form/> 
    <RecherchePereComp/>   
    
    
    {/*<CurrencyApp />*/}
    </>
);