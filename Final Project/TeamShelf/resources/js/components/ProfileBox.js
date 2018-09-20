import React, {Component} from 'react';
import axios from "axios";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faStroopwafel } from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
require('../styles/styles.css');
library.add(faStroopwafel);


export default class ProfileBox extends Component {

    constructor() {
        super();
        this.state = {
            graduates: []
        }
    }

    componentWillMount() {
        //    TODO The URL differs from serve to apache, the first one is for serve The second one is for apache
        axios.get('api/allGraduatesWithInfo').then(response => {
            // axios.get('http://localhost/Final%20Project/TeamShelf/public/api/admins').then(response => {
            this.setState({
                graduates: response.data
            });
        }).then(response => {
        }).catch(errors => {
            console.log(errors.response);
        })
    }

    render(){
        return(
            <div>

                {this.state.graduates.map(graduate =>
                        <div className="card" key={graduate.id}>
                            <img
                                // TODO need to find a way not to input relative path
                                src={require('../../../storage/app/public/images/TeamShelf.png')}
                                className='profileImage'/>
                            <h1>{graduate.first_name}{graduate.last_name}</h1>
                            <p className="title">{graduate.job_title}</p>
                            <p>{graduate.institute_university_name}</p>
                            <div className='socialMedia'>
                                {/*TODO edit the icon name*/}
                                <FontAwesomeIcon icon="500px" />
                            </div>
                            <p>
                                {/*TODO modify the email*/}
                                <button className='contactButton whiteText'><a className='whiteText' href="mailto:omar.ashi@hotmail.com?subject=Email%20Subject">Contact</a></button>
                            </p>
                        </div>

                )}
            </div>
        );
    }
}