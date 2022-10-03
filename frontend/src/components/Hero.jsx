import React, { Component } from 'react';
import axios from 'axios';

class Hero extends Component {
    constructor(props) {
        super(props);

        this.state = {
            data: {},
        };

        // API Endpoint
        this.api = '/api/v1/todo';
    }


    componentDidMount() {
        axios.get('http://localhost:8101/api/hero')
            .then((response) => {

                const data = response.data;
                this.setState({
                    data,
                });
            })
            .catch((error) => {
                // handle error
                console.log(error);
            });
    }


    render() {
        const hero_data = this.state.data;
        return(
            <div>
                <h1>Hero Component vagyok!</h1>
                <h2>{hero_data.title}</h2>
            </div>

        )
    }
}

export default Hero;


/*

export default function Hero2() {
    return (
        <h1>Hero Component vagyok</h1>
    );
}

if (document.getElementById('hero')) {
    ReactDOM.render(<Hero />, document.getElementById('hero'));
}*/
