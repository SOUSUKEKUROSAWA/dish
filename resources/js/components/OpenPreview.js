import React from 'react';
import ReactDOM from 'react-dom';
import Preview from "./Preview";

const OpenPreview = () => {
    const targetDom=document.getElementById("openpreview");
    const str_posts=targetDom?.dataset.posts;
    const posts=JSON.parse(str_posts ?? "");
    
    return (
        <>
            {posts.map((post)=>{
                return(
                    <>
                        <Preview url={post['url']} comment={post['comment']} createdAt={post['created_at']} />
                    </>
                )
            })}
        </>
    );
};

export default OpenPreview;

if (document.getElementById('openpreview')) {
    ReactDOM.render(<OpenPreview />, document.getElementById('openpreview'));
}
