import React from 'react';
import Item from './Item';

export default function ListItems(props) {
    const ordi = [
        {
            name: "PC1",
            src: "img.png",
            prix: "4000"
        },
        {
            name: "PC2",
            src: "img.png",
            prix: "5000"
        },
        {
            name: "PC3",
            src: "img.png",
            prix: "5000"
        },
        {
            name: "PC5",
            src: "img.png",
            prix: "5000"
        },
        {
            name: "PC6",
            src: "img.png",
            prix: "5000"
        },
        {
            name: "PC7",
            src: "img.png",
            prix: "5000"
        },
        {
            name: "PC8",
            src: "img.png",
            prix: "5000"
        },
        {
            name: "PC9",
            src: "img.png",
            prix: "6000"
        }
    ];
    return (
        <div className="item-box">
        {ordi.map((e, i) => <Item data={e} key={i}/>)}
        </div>
    )
}