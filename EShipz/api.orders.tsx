import type { LoaderFunctionArgs } from "@remix-run/node";
import { json } from "@remix-run/node";

export async function loader({request}:LoaderFunctionArgs){
    console.log(request.method)
    return json({data:"response from app"})
}

