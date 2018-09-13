import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Example extends Component {

    constructor() {
        super();
        this.state = {
            experiences: []
        }
    }

    componentWillMount() {
        axios.get('api/experiences').then(response => {
            this.setState({
                experiences: response.data
            });
        }).catch(errors => {
            console.log(errors);
        })
    }

    render() {
        return (
            <div className="container">
                {this.state.experiences.map(experience => <li>{experience.job_title}, {experience.company_name}</li>)}
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example/>, document.getElementById('example'));
}
