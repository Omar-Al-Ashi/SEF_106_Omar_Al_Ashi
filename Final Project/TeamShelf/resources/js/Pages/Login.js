import React, {Component} from 'react';
import {PostData} from "../Services/ApiRequests";
import axios from "axios";
import {Link, Redirect} from "react-router-dom";

export default class Login extends Component {

    constructor(props) {
        super(props);
        this.state = {
            email: '',
            password: '',
            Authorization: '',
            redirectToReferrer: false
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleLogout = this.handleLogout.bind(this);
    }

    handleLogout() {
        sessionStorage.removeItem('session');
        this.state.redirectToReferrer= false;
        return(
            <div className="alert alert-success">
                <strong> Login In</strong>
            </div>
        )
    }

    handleSubmit(evt) {
        let formData = {
            email: this.state.email,
            password: this.state.password,
        };

        evt.preventDefault();
        if (this.state.email && this.state.password) {
            axios.post('/api/login', formData)
                .then((result) => {
                    let responseJson = result;
                    if (JSON.stringify(responseJson.data)) {
                        // Setting the token to the session key in sessionStorage
                        sessionStorage.setItem('session', responseJson.data.success.token);
                        this.setState({redirectToReferrer: true});
                        return (<Redirect to={'/'}/>)
                    }

                });

        }

        // Handle form submit
        // axios.post('/api/login', formData)
        //     .then(res => console.log(res));
    }

    handleChange(evt) {
        this.setState({
            [evt.target.name]: evt.target.value,
        });
        // handle email change
    };


    render() {
        // if (this.state.redirectToReferrer) {
        //     return (<Redirect to={'/'}/>)
        // }

        if (sessionStorage.getItem('session')) {
            return (
                <div className="alert alert-success">
                    <strong> You are already logged in</strong>
                    <button
                        className="nav-item btn btn-outline-success my-2 my-sm-0"
                        onClick={this.handleLogout}>
                        Logout
                    </button>
                </div>
            )
        }
        return (
            <div>
                <div className="Login">

                    <div className="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {/*Start form */}
                        <form className="center" onSubmit={this.handleSubmit}>
                            <div className="form-group">
                                <label htmlFor="exampleInputEmail1">Email
                                    address</label>
                                <input type="email"
                                       className="form-control loginInput "
                                       aria-describedby="emailHelp"
                                       name='email'
                                       required
                                       placeholder="Enter email"
                                       value={this.state.email}
                                       onChange={this.handleChange}/>
                            </div>
                            <div className="form-group">
                                <label
                                    htmlFor="exampleInputPassword1">Password</label>
                                <input type="password"
                                       className="form-control loginInput "
                                       name="password" id="password"
                                       required
                                       placeholder="Password"
                                       value={this.state.password}
                                       onChange={this.handleChange}/>
                            </div>
                            <div className="form-check">
                                <input type="submit" value="Log In"
                                       data-test="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}