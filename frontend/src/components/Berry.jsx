import React, { Component } from 'react';

class Berry extends Component {

    render() {

        return(
        <div>
            <div className="container berry-container px-4 py-5" >
                <h2 className="pb-2 border-bottom">Tapasztalat</h2>
                <div className="row g-4 py-5 row-cols-1 row-cols-lg-3 row-cols-md-2">

                    <div className="text-center col" data-aos="fade-up">
                        <h3 className="fs-2">PHP</h3>
                        <i className="cbp-ig-icon berry-icon devicon-php-plain"></i>
                        <p>12 éve tapasztalat</p>
                    </div>

                    <div className="text-center col" data-aos="fade-up">
                        <h3 className="fs-2">Laravel</h3>
                        <i className="cbp-ig-icon berry-icon devicon-laravel-plain"></i>
                        <p>5 évet tapasztalat</p>
                    </div>

                    <div className="text-center col" data-aos="fade-up">
                        <h3 className="fs-2">Javascript</h3>
                        <i className="cbp-ig-icon berry-icon devicon-javascript-plain"></i>
                        <p>12 évet tapasztalat</p>
                    </div>

                    <div className="text-center col" data-aos="fade-up">
                        <h3 className="fs-2">MySql</h3>
                        <i className="cbp-ig-icon berry-icon devicon-mysql-plain"></i>
                        <p>12 évet tapasztalat</p>
                    </div>

                    <div className="text-center col" data-aos="fade-up">
                        <h3 className="fs-2">HTML5  CSS3</h3>
                        <i className="cbp-ig-icon berry-icon devicon-html5-plain"></i>
                        <i className="cbp-ig-icon berry-icon devicon-css3-plain"></i>
                        <p>12 éve tapasztalat </p>
                    </div>

                    <div className="text-center col horda-section" data-aos="fade-up">

                        <h3 className="fs-2 col-12">Egyéb technológiák</h3>
                        <div>
                            <i className="cbp-ig-icon berry-icon devicon-react-original"></i> <br/>
                            <span>React</span>
                        </div>
                        <div>
                            <i className="cbp-ig-icon berry-icon devicon-docker-plain"></i> <br/>
                            <span>Docker</span>
                        </div>
                        <div>
                            <i className="cbp-ig-icon berry-icon devicon-nodejs-plain"></i> <br/>
                            <span>Nodejs</span>
                        </div>
                        <div>
                            <i className="cbp-ig-icon berry-icon devicon-jquery-plain"></i> <br/>
                            <span>Jquery</span>
                        </div>

                    </div>

                </div>
            </div>


        </div>
        )
    }
}

export default Berry;