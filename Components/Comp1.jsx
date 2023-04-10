
function App1(){
    let d =  Date();

    return (
        <>
        <h1>Bonjour FS202 !</h1>
        <p>Date: {d.toLocaleLowerCase()}</p>

        </>
    );
}

function App2(props){
    let rem = 0.2;
    let total = props.prixUni * props.nbArt;
    return (
        <>
        <h2>Article: {props.nbArt}</h2>
        {props.nbArt > 6 ? 
            <>
            <p>Vous avez remise -{rem*100}%</p>
            <p>Total: {total - total * rem}</p>
            </>
        : 
            <p>Total: {total}</p>
        }
        </>

    );
}

export { App1, App2 };