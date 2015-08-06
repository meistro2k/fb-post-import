<?php
class SampleTest extends WP_UnitTestCase {

    function test_import_handler() {

        $handler = new Facebook_Post_Import_Handler();

        $json_data = array('bad' => 'data');

        $results = $handler->handle_import_facebook_feed($json_data);

        $this->assertEquals(0, $results );

        $json_data = '{
            "data": [
                {
                    "id": "123",
                    "from": {
                        "category": "Mock Feed",
                        "name": "site.com",
                        "id": "12345678"
                    },
                    "message": "Test Message",
                    "picture": "http://test-image.com/image.jpg",
                    "link": "http://test.com",
                    "name": "Test Name",
                    "caption": "Test Caption",
                    "description": "",
                    "icon": "http://test-image.com/icon.gif",
                    "actions": [
                        {
                            "name": "Comment",
                            "link": "http://test-url.com"
                        },
                        {
                            "name": "Like",
                            "link": "http://test-url.com"
                        }
                    ],
                    "privacy": {
                        "value": "",
                        "description": "",
                        "friends": "",
                        "allow": "",
                        "deny": ""
                    },
                    "type": "test_type",
                    "status_type": "test_type",
                    "application": {
                        "name": "Test App",
                        "namespace": "testapp",
                        "id": "123123"
                    },
                    "created_time": "2000-01-01T12:00:00+0000",
                    "updated_time": "2000-01-01T12:00:00+0000",
                    "shares": {
                        "count": 0
                    },
                    "is_hidden": false,
                    "likes": {
                        "data": [],
                        "paging": {}
                    },
                    "comments": {
                        "data": [],
                        "paging": {}
                    }
                }
            ],
            "paging": {
                "previous": "http://previous-url.com",
                "next": "http://next-url.com"
            }
        }';

        $results = $handler->handle_import_facebook_feed($json_data);

        $this->assertEquals(1, $results );

    }
}
