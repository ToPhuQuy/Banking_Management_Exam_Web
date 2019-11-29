<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Môn học - chủ đề</title>
    <link rel="shortcut icon" href="favicon.png">
    <?php 
        require(view_url('main/question-css'));
    ?>
    <style>
        .ql-container {
            font-size: 1rem;
        }

        div.ql-editor img {
            height: 200px;
        }

        div.ql-container.ql-snow {
            border: none;
        }

        div.ql-container.ql-snow .ql-editor {
            padding-left: 0;
            padding-top: 0;
        }
    </style>
    <?php
        require(view_url('main/question-js'));
    ?>
</head>

<body>
    <?php
        require(view_url('main/navbar'));
    ?>

    <div class="container-fluid px-4" id="main-container">
        <div class="row">
            <div class="col pl-0 pr-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="question.html">Câu hỏi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Môn & chủ đề</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 d-none d-md-block">
                <div class="row pb-2">
                    <div class="col pl-0">
                        <h3>Tùy chọn</h3>
                    </div>
                </div>
                <div class="row pt-1" id="left-sidebar">
                    <div class="col pl-0">
                        <div class="btn-group-vertical">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addSubjectModal">Thêm môn học</button>
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addTopicModal">Thêm chủ đề</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-none" id="add-topic-col">
                <div class="row pb-2">
                    <div class="col pl-0 pr-0">
                        <h3>Thêm chủ đề</h3>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col pl-0 pr-0 pr-md-3">
                        
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row d-block d-md-none">
                    <div class="col mb-3 pl-0 pr-0">
                        <div class="btn-group w-100" role="group">
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addSubjectModal">Thêm môn học</button>
                            <button class="btn btn-outline-success" data-toggle="modal" data-target="#addTopicModal">Thêm chủ đề</button>
                        </div>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col pl-0">
                        <h3>Môn học & Chủ đề</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col pl-0 pr-0">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Môn học</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Chủ đề</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="table-responsive"  id="list-subject">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>Môn học</th>
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        </tr>
                                        <tr v-for="s in subjectList" is="subject-row" v-bind:sname="s.name" v-bind:sid="s.id"></tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="table-responsive" id="list-topic">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <select name="subject" class="form-control" v-model="subjectId">
                                                    <option value="all">Môn học (tất cả)</option>
                                                    <option v-for="s in subjectList" v-bind:value="s.id">
                                                        {{s.name}}
                                                    </option>
                                                </select>
                                            </th>
                                            <th>Chủ đề</th>
                                            <th>Xóa</th>
                                            <th>Sửa</th>
                                        </tr>
                                        <tr v-for="t in topicList" is="topic-row" v-bind:tid="t.id" v-bind:tname="t.name" v-bind:sname="t.sname"></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubjectLabel">Thêm môn học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="uname" class="text-md-left">Tên môn học</label>
                        <input class="form-control" id="subject" name="subject" type="text" placeholder="Tên môn học" v-model="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" v-on:click="addSubject" data-dismiss="modal">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addTopicModal" tabindex="-1" role="dialog" aria-labelledby="addTopicLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTopicLabel">Thêm chủ đề</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="uname" class="text-md-left">Tên chủ đề</label>
                        <input class="form-control" id="uname" name="uname" v-model="name" type="text" placeholder="Tên môn học">
                    </div>
                    <div class="form-group">
                        <label for="sub" class="text-md-left">Môn học</label>
                        <select name="sub" id="sub" class="form-control" v-model="subjectId">
                            <option v-for="s in subjectList" v-bind:value="s.id">{{s.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary"  data-dismiss="modal" v-on:click="addTopic" data-dismiss="modal">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function ajaxCall(data, doneCallBack, catchCallback) {
            $.ajax({
                url: '/topic',
                method: 'post',
                data: data,
                dataType: 'json'
            }).done(doneCallBack).catch(catchCallback);
        }

        function updateSubjectList() {
            subjectList.subjectList.splice(0, 10000);
            var l = subjectList.subjectList;
            $.ajax({
                url: '/topic',
                method: 'post',
                data: {
                    cmd: 'getListSubject'
                },
                dataType: 'json'
            }).done(function(data) {
                for (var row of data) {
                    l.push(row);
                }
            }).catch(function(error) {
                console.log(error);
            });
        }

        function updateTopicList() {
            topicList.topicList.splice(0, 10000);
            var l = topicList.topicList;
            $.ajax({
                url: '/topic',
                method: 'post',
                data: {
                    cmd: 'getListTopic',
                    subjectId: topicList.subjectId
                },
                dataType: 'json'
            }).done(function(data) {
                for (var row of data) {
                    l.push(row);
                }
            }).catch(function(error) {
                console.log(error);
            });
        }

        Vue.component('subject-row', {
            template: `
            <tr>
                <td>{{sid}}</td>
                <td><input type="text" v-model="sname" class="form-control"></td>
                <td><button class="btn btn-outline-danger" v-on:click="deleteMethod">Xóa</button></td>
                <td><button class="btn btn-outline-success edit-subject-btn" v-on:click="update">{{ text }}</button></td>
            </tr>
            `,
            props: ['sid', 'sname'],
            data: function() {
                return {
                    ifChange: false,
                    text: 'Sửa'
                }
            },
            watch: {
                sname: function () {
                    this.text = 'Lưu';
                }
            },
            methods: {
                update: function () {
                    alert(this.sname);
                },
                deleteMethod: function () {
                    $.ajax({
                        url: '/topic',
                        method: 'post',
                        data: {
                            cmd: 'delete',
                            id: this.sid
                        },
                        dataType: 'json'
                    }).done(function(data) {
                        if (data == true) {
                            updateSubjectList();
                        }
                    });
                },
                update: function () {
                    $.ajax({
                        url: '/topic',
                        method: 'post',
                        data: {
                            cmd: 'update',
                            id: this.sid,
                            name: this.sname
                        },
                        dataType: 'json'
                    }).done(function(data) {
                        updateSubjectList();
                    });   
                }
            }
        });

        Vue.component('topic-row', {
            template: `
            <tr>
                <td>{{ tid }}</td>
                <td>{{ sname }}</td>
                <td>{{ tname }}</td>
                <td><button class="btn btn-outline-danger">Xóa</button></td>
                <td><button class="btn btn-outline-success">Sửa</button></td>
            </tr>
            `,
            props: ['tid', 'sname', 'tname']
        })

        var vaddSubject = new Vue({
            el: '#addSubjectModal',
            data: {
                name: ''
            },
            methods: {
                addSubject: function() {
                    var thisObj = this;
                    $.ajax({
                        url: '/topic',
                        method: 'post',
                        data: {
                            cmd: 'addSubject',
                            name: this.name
                        },
                        dataType: 'json'
                    }).done(function(data) {
                        if (data == true) {
                            updateSubjectList();
                            thisObj.name = '';
                        } else {
                            console.log('error');
                        }
                    }).catch(function(err) {
                        console.log(err);
                    });
                }
            }
        });

        var subjectList = new Vue({
            el: '#list-subject',
            data: {
                subjectList: []
            },
            mounted() {
                var l = this;
                $.ajax({
                    url: '/topic',
                    method: 'post',
                    data: {
                        cmd: 'getListSubject'
                    },
                    dataType: 'json'
                }).done(function(data) {
                    for (var row of data) {
                        l.subjectList.push(row);
                    }
                }).catch(function(error) {
                    console.log(error);
                });
            }
        });

        var vaddTopic = new Vue({
            el: '#addTopicModal',
            data: {
                subjectList: subjectList.subjectList,
                name: '',
                subjectId: ''
            },
            methods: {
                addTopic: function () {
                    ajaxCall({
                        cmd: 'addTopic',
                        name: this.name,
                        subjectId: this.subjectId
                    }, function (data) {
                        updateTopicList();
                    }, function (err) {
                        console.log(err);
                    })
                }
            }
        });

        var topicList = new Vue({
            el: '#list-topic',
            data: {
                subjectList: subjectList.subjectList,
                topicList: [],
                subjectId: 'all'
            },
            watch: {
                subjectId: function () {
                    updateTopicList();
                }
            }
        });
        updateTopicList();
    </script>
</body>

</html>