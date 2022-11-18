import React, { Component } from 'react';
import axios from 'axios';
import htmlParser from 'html-react-parser';

class Berry extends Component {
    constructor(props) {
        super(props);

        this.state = {
            data:[],
        };

    }

    componentDidMount() {

        const params = { slug: 'brick-section'};

        axios.get('api/section', {params} )
            .then((response) => {
                this.setState({
                    data: response.data,
                });
            })
            .catch((error) => {
                console.log(error);
            });
    }

    render() {

        return(
        <div>
            <div className="container brick-container px-4 py-5">
                <h2 className="pb-2 border-bottom">Munkahelyek</h2>
                <table >
                    <thead>
                    <tr>
                        <th scope="col">Év</th>
                        <th scope="col">Név</th>
                        <th scope="col">Leírás</th>
                    </tr>
                    </thead>
                    <tbody>
                        {this.state.data.map((item, index) => {
                            return (
                                <tr key={item.id}>
                                    <td >{item.title}</td>
                                    <td >{item.name}</td>
                                    <td >{htmlParser(item.description)}</td>
                                </tr>
                            )
                        })}
                    </tbody>
                </table>
            </div>
        </div>
        )
    }
}

export default Berry;