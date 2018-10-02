import React, {Component} from 'react';
import ProfileCard from "../../Components/ProfileCard";
import axios from "axios";
import {BrowserRouter as Router, Link, Route} from "react-router-dom";
import GraduateInfo from "./GraduateInfo";


export default class ViewAll extends Component {

    constructor(props) {
        super(props);
        this.state = {
            graduates: [],
        }
    }

    componentWillMount() {
        let config = {
            headers: {'Authorization': "Bearer " + sessionStorage.getItem('session')}
        };
        //    TODO The URL differs from serve to apache, the first one is for serve The second one is for apache
        axios.get('api/allGraduatesWithInfo', config).then(response => {
            // axios.get('http://localhost/Final%20Project/TeamShelf/public/api/admins').then(response => {
            this.setState({
                graduates: response.data
            });
        }).then(response => {
        }).catch(errors => {
            console.log(errors.response);
        })
    }

    render() {
        return (
            <div className='background'>
                {this.state.graduates.map(graduate =>

                        <ProfileCard
                            key={graduate.user_id}
                            id={graduate.user_id}
                            first_name={graduate.first_name}
                            last_name={graduate.last_name}
                            title={graduate.job_title}
                            university={graduate.institute_university_name}
                            github={graduate.github}
                            linkedin={graduate.linkedin}
                            email={graduate.email}
                            user_image={graduate.user_image}
                        />

                )}
                
            </div>
        );
    }
}