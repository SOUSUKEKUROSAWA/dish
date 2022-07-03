import React from 'react';
import ReactDOM from 'react-dom';
import Preview from "./Preview";

const OpenPreview = () => {
    const targetDom=document.getElementById("openpreview");
    const str_posts=targetDom?.dataset.posts;
    const posts=JSON.parse(str_posts ?? "");
    
    return (
        <>
            <div className="posts">
                {posts.map((post)=>{
                    return(
                        <>
                            <Preview url={post['url']} img_path={post['img_path']} comment={post['comment']} createdAt={post['created_at']} updatedAt={post['updated_at']} />
                        </>
                    )
                })}
            </div>
        </>
    );
};

export default OpenPreview;

if (document.getElementById('openpreview')) {
    ReactDOM.render(<OpenPreview />, document.getElementById('openpreview'));
}
