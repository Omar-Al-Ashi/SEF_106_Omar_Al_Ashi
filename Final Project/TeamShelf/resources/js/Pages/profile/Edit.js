import React, {Component} from 'react';
import {RadioGroup, RadioButton} from 'react-radio-buttons';
import axios from 'axios';

require('../../styles/styles.css');


export default class Edit extends Component {

    constructor() {
        super();
        this.state = {
            admins: [],
            gender: [],
            selectedFile: null,
            isCurrentJob: null
        };
        this.onChange = this.onChange.bind(this);
        this.fileChangedHandler = this.fileChangedHandler.bind(this);
        this.isCurrentJobOnChange = this.isCurrentJobOnChange.bind(this);
    }

    onChange(value) {
        this.setState({
            gender: value
        });
    }

    fileChangedHandler(event) {
        this.setState({
            selectedFile: event.target.files[0]
        });
    };

    fileUploadHandler() {
        const formData = new FormData();
        formData.append('image', this.state.selectedFile, this.state.selectedFile.name);
        // TODO change the post request URL
        axios.post('my-domain.com/file-upload', formData, {
            onUploadProgress: progressEvent => {
                //This is showing the percentage uploaded
                console.log('Upload progress' + Math.round(progressEvent.loaded / progressEvent.total * 100 + '%'));
            }
        })
            .then(res => {
                console.log(res.data);
            })
    }

    isCurrentJobOnChange(value) {
        this.setState({
            isCurrentJob: value
        });
    }

    render() {
        return (
            <div>
                <form>
                    <div className="left">
                        <h2>Basic Info</h2>
                        <div className="centered">
                            <div className='jumbotron'>

                                <div className='form-group'>

                                    {/*Date of Birth*/}
                                    <div className='date_of_birth'>
                                        <label htmlFor="date_of_birth">Date of
                                            Birth</label>
                                        <input type='date'
                                               placeholder='Date of Birth'
                                               className='form-control'
                                               id='date_of_birth'/>
                                    </div>

                                    {/*Gender*/}
                                    <div className='gender'>
                                        <RadioGroup onChange={this.onChange}
                                                    horizontal>
                                            <RadioButton value="Male">
                                                Male
                                            </RadioButton>
                                            <RadioButton value="Female">
                                                Female
                                            </RadioButton>
                                            <RadioButton value="Other">
                                                Other
                                            </RadioButton>
                                        </RadioGroup>
                                    </div>
                                </div>

                                {/*Phone*/}
                                <div className='phone'>
                                    <label htmlFor="phone">Phone</label>
                                    <input type='phone'
                                           placeholder='Phone'
                                           className='form-control'
                                           id='phone'/>
                                </div>

                                {/*Profile Pic*/}
                                <div className='profile_pic'>
                                    <label htmlFor="profile_pic">Profile
                                        Picture</label>
                                    <input type="file"
                                           onChange={this.fileChangedHandler}/>
                                    <button
                                        onClick={this.fileUploadHandler}>Upload!
                                    </button>
                                </div>

                                {/*First Name*/}
                                <div className='first_name'>
                                    <label htmlFor="first_name">First
                                        Name</label>
                                    <input type='text'
                                           placeholder='First Name'
                                           className='form-control'
                                           id='first_name'/>
                                </div>

                                {/*Last Name*/}
                                <div className='last_name'>
                                    <label htmlFor="last_name">Last Name</label>
                                    <input type='text'
                                           placeholder='Last Name'
                                           className='form-control'
                                           id='last_name'/>
                                </div>

                                {/*Residency Location*/}
                                <div className='residency_location'>
                                    <label htmlFor="residency_location">Residency
                                        Location</label>
                                    <input type='text'
                                           placeholder='Residency Location'
                                           className='form-control'
                                           id='residency_location'/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="middle">
                        <h2>Education</h2>
                        <div className="centered">
                            <div className='jumbotron'>

                                {/*Major*/}
                                <div className='major'>
                                    <label htmlFor="major">Major</label>
                                    <input type='text'
                                           placeholder='major'
                                           className='form-control'
                                           id='major'/>
                                </div>

                                {/*Institute*/}
                                <div className='institute'>
                                    <label htmlFor="institute">Institute</label>
                                    <input type='text'
                                           placeholder='Institute'
                                           className='form-control'
                                           id='institute'/>
                                </div>

                                {/*Education Start Date*/}
                                <div className='education_start_date'>
                                    <label htmlFor="education_start_date">Start
                                        Date</label>
                                    <input type='date'
                                           placeholder='Start Date'
                                           className='form-control'
                                           id='education_start_date'/>
                                </div>

                                {/*Education End Date*/}
                                <div className='end_date'>
                                    <label htmlFor="education_end_date">End
                                        Date</label>
                                    <input type='date'
                                           placeholder='End Date'
                                           className='form-control'
                                           id='education_end_date'/>
                                </div>

                                {/*GPA*/}
                                <div className='gpa'>
                                    <label htmlFor="gpa">GPA</label>
                                    <input type='number'
                                           placeholder='GPA'
                                           className='form-control'
                                           id='gpa'/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="right">
                        <h2>Experience</h2>
                        <div className="centered">
                            <div className='jumbotron'>

                                {/*is Current Job*/}
                                <div className='is_current_job'>
                                    <label htmlFor="is_current_job">Current
                                        Job</label>
                                    <RadioGroup
                                        onChange={this.isCurrentJobOnChange}
                                        horizontal>
                                        <RadioButton value="1">
                                            Yes
                                        </RadioButton>
                                        <RadioButton value="0">
                                            No
                                        </RadioButton>
                                    </RadioGroup>
                                </div>

                                {/*Experience Start Date*/}
                                <div className='experience_start_date'>
                                    <label htmlFor="experience_start_date">Start
                                        Date</label>
                                    <input type='date'
                                           placeholder='Start Date'
                                           className='form-control'
                                           id='experience_start_date'/>
                                </div>

                                {/*Experience End Date*/}
                                <div className='experience_end_date'>
                                    <label htmlFor="experience_end_date">End
                                        Date</label>
                                    <input type='date'
                                           placeholder='End Date'
                                           className='form-control'
                                           id='experience_end_date'/>
                                </div>

                                {/*Title*/}
                                <div className='title'>
                                    <label htmlFor="title">Title</label>
                                    <input type='text'
                                           placeholder='Title'
                                           className='form-control'
                                           id='title'/>
                                </div>

                                {/*Company Name*/}
                                <div className='company_name'>
                                    <label htmlFor="company_name">Company
                                        Name</label>
                                    <input type='text'
                                           placeholder='Company Name'
                                           className='form-control'
                                           id='company_name'/>
                                </div>

                                {/*Company Location*/}
                                <div className='company_lcoation'>
                                    <label htmlFor="company_lcoation">Company
                                        Location</label>
                                    <input type='text'
                                           placeholder='Company Location'
                                           className='form-control'
                                           id='company_lcoation'/>
                                </div>

                                {/*Description*/}
                                <div className='description'>
                                    <label
                                        htmlFor="description">Description</label>
                                    <input type='text'
                                           placeholder='Description'
                                           className='form-control'
                                           id='description'/>
                                </div>

                                {/*Skills*/}
                                <div className='skills'>
                                    <label htmlFor="skills">Skills</label>
                                    <input type='text'
                                           placeholder='Skills'
                                           className='form-control'
                                           id='skills'/>
                                </div>

                                {/*LinkedIn*/}
                                <div className='linkedIn'>
                                    <img
                                        // TODO need to find a way not to input relative path
                                        src={require('../../../../public/images/linkedin.png')}
                                        style={{height: 40, width: 40}}/>
                                    <input type='text'
                                           placeholder='LinkedIn'
                                           className='form-control'
                                           id='linkedIn'/>
                                </div>

                                {/*GitHub*/}
                                <div className='GitHub'>
                                    <img
                                        // TODO need to find a way not to input relative path
                                        src={require('../../../../public/images/github.png')}
                                        style={{height: 40, width: 40}}/>
                                    <input type='text'
                                           placeholder='GitHub'
                                           className='form-control'
                                           id='GitHub'/>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/*<input type="submit" value="Submit" >Submit</input>*/}
                </form>
            </div>
        );
    }
}