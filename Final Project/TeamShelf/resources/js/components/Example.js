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
        //    TODO The URL differs from serve to apache, the first one is for serve The second one is for apache
        axios.get('api/admins').then(response => {
            // axios.get('http://localhost/Final%20Project/TeamShelf/public/api/admins').then(response => {
            this.setState({
                admins: response.data
            });
            console.log(response)
        }).then(response => {
            console.log(response);
        }).catch(errors => {
            console.log(errors.response);
        })
    }

    render() {
        return (
            <div className="container">
                List of admins
                {this.state.admins.map(admin =>
                    <li key={admin.id}>
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
