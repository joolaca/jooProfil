import React, { Component } from 'react';
import axios from 'axios';
import htmlParser from 'html-react-parser';

class Welcome extends Component {
    constructor(props) {
        super(props);

        this.state = {
            data:[],
        };

    }

    componentDidMount() {

        const params = { slug: 'simple-text-section'};

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
            <div className="container simple-text-container px-4 py-5">
                <h2 className="pb-2 border-bottom">Magamról {process.env.API_URL}</h2>

                <div className="row ">
                    <div className="col-lg-10 mx-auto text-center ">

                        {this.state.data.map((item, index) => {
                            return (
                                <section key={item.id} data-aos="fade-down">
                                    <h3>{item.title}</h3>
                                    {htmlParser(item.description)}
                                </section>
                            )
                        })}
                    </div>
                </div>
            </div>
        </div>
        )
    }
}

export default Welcome;