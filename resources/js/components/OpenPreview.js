import React, { useState } from "react";
import ReactDOM from 'react-dom';
import Preview from "./Preview";

const OpenPreview = () => {
    const [showPreview, setShowPreview] = useState(false);
    const ShowPreview = () => {
        setShowPreview(true);
    };
    
    const targetDom=document.getElementById("openpreview");
    const str_posts=targetDom?.dataset.posts;
    const posts=JSON.parse(str_posts ?? "");
    
    return (
        <>
            {posts.map((post)=>{
                return(
                    <>
                        <button onClick={ShowPreview}>サイトをプレビュー</button>
                        <Preview open={showPreview} setShowPreview={setShowPreview} url={post['url']} />
                        <h2 className='comment'>{post['comment']}</h2>
                        <div>作成日時：{post['created_at']}</div>
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
