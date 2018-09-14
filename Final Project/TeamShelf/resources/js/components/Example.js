import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import {BrowserRouter as Router, Route, Link} from 'react-router-dom'


export default class Example extends Component {

    constructor() {
        super();
        this.state = {
            admins: []
        }
    }

    componentWillMount() {
        axios.get('api/admins').then(response => {
            this.setState({
                admins: response.data
            });
        }).catch(errors => {
            console.log(errors);
        })
    }

    render() {
        return (
            <div className="container">
                This is the body
                {this.state.admins.map(admin =>
                    <li>
                        <Router>
                                <Link to={"admin/" + admin.id}>
                                    {admin.first_name}
                                </Link>
                        </Router>
                    </li>
                )}
            </div>
        );
    }
}
