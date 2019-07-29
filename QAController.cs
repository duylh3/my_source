using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using ideal.ModelView;
using ideal.Repositories;

namespace ideal.Controllers
{
    public class QAController : Controller
    {

        private QuestionRepository _re = new QuestionRepository();
    //    GET: QA
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult CauHoi()
        {
           return View();
        }

        public JsonResult GetData(string cate)
        {
            var data = _re.ListQuestion(cate);
            return Json(data, JsonRequestBehavior.AllowGet);
        }
    }
}